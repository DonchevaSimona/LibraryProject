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
          variant="primary"
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
import book from '@/mixins/book'

export default {
  components: {
    BCard, BCol, BRow, BButton,
  },
  mixins: [book],
  data() {
    return {
      books: [],
      user: JSON.parse(localStorage.getItem('user')),
    }
  },
  created() {
    this.getRentedBooksForUser('all')
  },
  methods: {

  },
}
</script>

<style>

</style>
