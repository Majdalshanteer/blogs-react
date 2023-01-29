import axios from 'axios';
const KEY = 'AIzaSyCoDeb-LrindSH_kSsXHq3zSJrr6BqU9kE'; 

export default axios.create({
    baseURL: 'https://www.googleapis.com/youtube/v3/',
    params: {
        part: 'snippet',
        maxResults: 5,
        key: KEY
    }
})