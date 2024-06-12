// src/features/auth/Login.js
import React, { useState } from 'react';
import { useLoginUserMutation } from '../../api/apiSlice';
import { useDispatch } from 'react-redux';
import { setToken } from './authSlice';

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [loginUser, { isLoading, error }] = useLoginUserMutation();
  const dispatch = useDispatch();

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const result = await loginUser({ email, password }).unwrap();
      dispatch(setToken(result.token)); // Assuming the response contains the token
    } catch (err) {
      console.error('Failed to login: ', err);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Email:
        <input
          type="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
      </label>
      <label>
        Password:
        <input
          type="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />
      </label>
      <button type="submit" disabled={isLoading}>
        {isLoading ? 'Logging in...' : 'Login'}
      </button>
      {error && <p>{error.message}</p>}
    </form>
  );
};

export default Login;
