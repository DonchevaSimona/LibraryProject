import axios from 'axios'

export default {
  methods: {
    getAllBooks() {
      axios({
        method: 'get',
        url: '/get_all_books',
      }).then(response => {
        this.books = response.data
      })
    },
    rentBook(id) {
      axios({
        method: 'post',
        url: '/rent_book',
        data: {
          id,
          user_id: this.user.id,
        },
      }).then(response => {
        this.$router.push({ name: 'current-rented' })
      })
    },

    getRentedBooksForUser(flag) {
      axios.get('/get_rented_books_for_user',
        {
          params: {
            user_id: this.user.id,
            flag,
          },
        })
        .then(response => {
          this.books = response.data
        })
    },

    returnBook(id) {
      axios({
        method: 'post',
        url: '/return_book',
        data: {
          id,
        },
      }).then(response => {
        this.$router.push({ name: 'home' })
      })
    },
  },
}
