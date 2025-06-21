const { createApp } = Vue;

// ✅ Atur URL backend CI4
const apiUrl = 'http://localhost/lab11_php_ci/public';

createApp({
  data() {
    return {
      artikel: [],
      formData: {
        id: null,
        judul: '',
        isi: '',
        status: 0
      },
      showForm: false,
      formTitle: 'Tambah Data',
      statusOptions: [
        { text: 'Draft', value: 0 },
        { text: 'Publish', value: 1 }
      ]
    };
  },

  mounted() {
    this.loadData();
  },

  methods: {
    loadData() {
      axios.get(`${apiUrl}/post`)
        .then(response => {
          console.log("API Response:", response.data);
          this.artikel = response.data.artikel;
        })
        .catch(error => {
          console.error("Gagal ambil data:", error);
        });
    },

    tambah() {
      this.showForm = true;
      this.formTitle = 'Tambah Data';
      this.formData = {
        id: null,
        judul: '',
        isi: '',
        status: 0
      };
    },

    edit(data) {
      this.showForm = true;
      this.formTitle = 'Ubah Data';
      this.formData = { ...data }; // Copy data biar reactive
    },

    hapus(index, id) {
      if (confirm('Yakin ingin menghapus data ini?')) {
        axios.delete(`${apiUrl}/post/${id}`)
          .then(() => {
            this.artikel.splice(index, 1); // hapus dari array
          })
          .catch(error => {
            console.error("Gagal hapus data:", error);
          });
      }
    },

    saveData() {
      const isUpdate = this.formData.id !== null;
      const url = isUpdate
        ? `${apiUrl}/post/${this.formData.id}`
        : `${apiUrl}/post`;

      const method = isUpdate ? 'put' : 'post';

      axios[method](url, this.formData)
        .then(() => {
          this.loadData(); // reload data setelah tambah/edit
          this.showForm = false;
        })
        .catch(error => {
          console.error("Gagal simpan data:", error);
        });

      // Reset form
      this.formData = {
        id: null,
        judul: '',
        isi: '',
        status: 0
      };
    },

    statusText(status) {
      return status == 1 ? 'Publish' : 'Draft';
    }
  }
}).mount('#app');