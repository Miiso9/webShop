import {ref} from "vue";

export default {
    user: {
        token: sessionStorage.getItem('TOKEN'),
        data: {}
    },
    products: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    users: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    customers: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    countries: [],
    orders: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    toast: {
        show: false,
        message: '',
        delay: 5000
    },
    dateOptions: [
        { key: '1d', text: 'Zadnji Dan' },
        { key: '1k', text: 'Zadnji Tjedan' },
        { key: '2k', text: 'Zadnja 2 Tjedna' },
        { key: '1m', text: 'Zadnji Mjesec' },
        { key: '3m', text: 'Zadnja 3 Mjeseca' },
        { key: '6m', text: 'Zadnjih 6 Mjeseci' },
        { key: 'all', text: 'Cijelo Vrijeme' },
    ]
}
