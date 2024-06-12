// src/api/apiSlice.js
import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const apiSlice = createApi({
  reducerPath: 'api',
  baseQuery: fetchBaseQuery({
    baseUrl: process.env.REACT_APP_API_URL,
    prepareHeaders: (headers, { getState }) => {
      const token = getState().auth.token;

      if (token) {
        headers.set('Authorization', `Bearer ${token}`);
      }

      return headers;
    },
  }),
  endpoints: (builder) => ({
    loginUser: builder.mutation({
      query: ({ email, password }) => ({
        url: '/auth/UserLogin',
        method: 'POST',
        body: { email, password },
      }),
    }),
    getUserData: builder.query({
      query: () => '/user/UserView', // Adjust this endpoint as per your API
    }),
  }),
});

export const { useLoginUserMutation, useGetUserDataQuery } = apiSlice;
export default apiSlice;
