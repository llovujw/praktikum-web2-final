<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $artikelModel = new ArtikelModel();
        $kategoriModel = new \App\Models\KategoriModel();
    
        $q = $this->request->getVar('q');
        $id_kategori = $this->request->getVar('kategori');
    
        $builder = $artikelModel->select('artikel.*, kategori.nama_kategori')
                                ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');
    
        if ($q) {
            $builder->like('judul', $q);
        }
    
        if ($id_kategori) {
            $builder->where('artikel.id_kategori', $id_kategori);
        }
    
        $artikel = $builder->paginate(6);
        $pager = $artikelModel->pager;
        $kategori = $kategoriModel->findAll();
    
        return view('artikel/index', compact('artikel', 'title', 'pager', 'q', 'kategori', 'id_kategori'));
    }    

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                         ->where('slug', $slug)
                         ->first();

        // Jika tidak ditemukan, tampilkan 404
        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new \App\Models\ArtikelModel();
    
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;
    
        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
    
        if ($q !== '') {
            $builder->like('artikel.judul', $q);
        }
    
        if ($kategori_id !== '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }
    
        $artikel = $builder->paginate(10, 'default', $page);
        $pager = $model->pager;
    
        $data = [
            'title' => $title,
            'q' => $q,
            'kategori_id' => $kategori_id,
            'artikel' => $artikel,
            'pager' => $pager,
        ];
    
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            $kategoriModel = new \App\Models\KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            return view('artikel/admin_index', $data);
        }
    }       

    public function add()
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $kategori = $kategoriModel->findAll();
    
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
    
        $isDataValid = $validation->withRequest($this->request)->run();
    
        if ($isDataValid)
        {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
            }
    
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'gambar'      => $file->getName(),
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
    
            return redirect()->to('/admin/artikel');
        }
    
        $title = "Tambah Artikel";
        return view('artikel/form_add', compact('title', 'kategori'));
    }     

    public function edit($id)
    {
        $artikelModel = new ArtikelModel();
        $kategoriModel = new \App\Models\KategoriModel();
    
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
    
        $isDataValid = $validation->withRequest($this->request)->run();
    
        if ($isDataValid) {
            $artikelModel->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
            return redirect()->to('/admin/artikel');
        }
    
        $data = $artikelModel->find($id);
        $kategori = $kategoriModel->findAll();
        $title = "Edit Artikel";
    
        return view('artikel/form_edit', compact('title', 'data', 'kategori'));
    }    

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);

        return redirect()->to('/admin/artikel');
    }
}