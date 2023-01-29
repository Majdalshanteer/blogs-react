import { ADD_BLOG, DELETE_BLOG } from "./blogTypes";

// payload is curage الحمولة
export const addBlog = (blog) => {
    return {
        type: ADD_BLOG,
        payload: blog
    }
}

export const deleteBlog = (blog) => {
    return {
        type: DELETE_BLOG,
        payload: blog.id
    }
}