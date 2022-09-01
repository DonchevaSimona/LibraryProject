import Vue from 'vue'
import moment from 'moment/moment'

Vue.filter('moment_time', value => moment(value).format('HH:mm:ss'))

Vue.filter('dateConvertDDMMYYYY', value => moment(value).format('DD-MM-YYYY'))

Vue.filter('date_ll', value => moment(value).format('ll'))

Vue.filter('timeAgo', date => {
  if (date !== null) {
    return moment(date).fromNow()
  }
  return ''
})

Vue.filter('numbers_with_comas', number => Number(number).toLocaleString('en-US'))
