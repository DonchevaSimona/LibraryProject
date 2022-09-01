<template>
  <b-card>
    <p>You have a book and you believe others will enjoy reading it as well.</p>
    <p>We have a solution for that :)</p>
    <hr>
    <validation-observer ref="donateBookFormValidation">
      <b-form>
        <b-row>
          <b-col md="6">
            <!-- basic input -->
            <b-form-group>
              <p class="mb-0">
                Title*
              </p>
              <validation-provider
                v-slot="{ errors }"
                name="Title"
                rules="required"
              >
                <b-form-input
                  v-model="title"
                  :state="errors.length > 0 ? false:null"
                  placeholder="Enter Book Title"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col md="6">
            <!-- basic input -->
            <b-form-group>
              <p class="mb-0">
                Author*
              </p>
              <validation-provider
                v-slot="{ errors }"
                name="Author"
                rules="required"
              >
                <b-form-input
                  v-model="author"
                  :state="errors.length > 0 ? false:null"
                  placeholder="Written By"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col md="6">
            <!-- basic input -->
            <b-form-group>
              <p class="mb-0">
                ISBN*
              </p>
              <validation-provider
                v-slot="{ errors }"
                name="ISBN"
                rules="required|integer"
              >
                <b-form-input
                  v-model="isbn"
                  :state="errors.length > 0 ? false:null"
                  placeholder="ISBN"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col
            md="6"
          >
            <p class="sidebar-input-text">
              Year Of Publish*:
            </p>
            <validation-provider
              v-slot="{ errors }"
              name="Year Of Publish"
              rules="required"
            >
              <b-form-group>
                <b-form-input
                  v-model="year_of_publish"
                  :state="errors.length > 0 ? false:null"
                  placeholder="Year"
                />
              </b-form-group>
              <small class="text-danger">{{ errors[0] }}</small>
            </validation-provider>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-button
              size="sm"
              variant="primary"
              @click.prevent="donateBook()"
            >
              Donate Book
            </b-button>
          </b-col>

        </b-row>
      </b-form>
    </validation-observer>
  </b-card>
</template>

<script>
import {
  BCard, BCol, BRow, BButton, BForm, BFormGroup, BFormInput,
} from 'bootstrap-vue'
import axios from 'axios'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required, integer } from '@validations'
import ToastificationContent from '@core/components/toastification/ToastificationContent'

export default {
  components: {
    BCard,
    BCol,
    BRow,
    BButton,
    BForm,
    BFormGroup,
    BFormInput,

    ValidationProvider,
    ValidationObserver,
  },
  data() {
    return {
      title: '',
      author: '',
      isbn: '',
      year_of_publish: '',
      user: JSON.parse(localStorage.getItem('user')),

      // validation
      required,
      integer,
    }
  },
  methods: {
    donateBook() {
      axios({
        method: 'post',
        url: '/donate_book',
        data: {
          title: this.title,
          author: this.author,
          isbn: this.isbn,
          year_of_publish: this.year_of_publish,
        },
      }).then(response => {
        this.$toast({
          component: ToastificationContent,
          props: {
            title: 'Book Donated!',
            icon: 'EditIcon',
            text: 'Thanks for expanding the library',
            variant: 'success',
          },
        })
        this.title = ''
        this.author = ''
        this.isbn = ''
        this.year_of_publish = ''
      })
    },
  },
}
</script>

<style>

</style>
