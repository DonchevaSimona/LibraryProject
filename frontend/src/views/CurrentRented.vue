<template>
  <b-card v-if="books.length > 0">
    <b-row
      v-for="(book, index) in books"
      :key="index"
    >
      <b-col>
        <p> >>> <b>{{ book.title }}</b> by {{ book.author }}
        </p>
      </b-col>
      <b-col md="2">
        <b-button
          size="sm"
          variant="outline-primary"
          :disabled="!book.available"
          @click.prevent="rentBook(book.id)"
        >
          Rent Again
        </b-button>
      </b-col>
      <b-col md="2">
        <b-button
          size="sm"
          variant="outline-primary"
          :disabled="!!book.available"
          @click.prevent="returnBook(book.id)"
        >
          Return
        </b-button>
      </b-col>
      <b-col md="2">
        <span class="secondary"> published: {{ book.year_of_publish }}</span>
      </b-col>
    </b-row>
  </b-card>
</template>

<script>
import {
  BCard, BCol, BRow, BButton,
} from 'bootstrap-vue'
import axios from 'axios'

export default {
  components: {
    BCard, BCol, BRow, BButton,
  },
  data() {
    return {
      books: [],
      user: JSON.parse(localStorage.getItem('user')),
    }
  },
  created() {
    this.getCurrentlyRentedBooksForUser()
  },
  methods: {
      getAllBooks() {
          axios({
              method: 'get',
              url: '/get_all_books',
          }).then(response => {
              this.books = response.data
          })
      },
    getCurrentlyRentedBooksForUser() {
      axios.get('/get_rented_books_for_user',
        {
          params: {
            user_id: this.user.id,
            flag: 'current',
          },
        })
        .then(response => {
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
        this.getAllBooks()
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
          this.getAllBooks()
      })
    },
  },
}
</script>

<style>

</style>
