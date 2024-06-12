import logo from './logo.svg';
import './App.css';
import { Counter } from './features/counter/Counter';
import Login from './auth/login';

function App() {
  const apiUrl = process.env.REACT_APP_API_URL;
  return (
    <div className="App">
      {/* <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header> */}

      {/* <Counter/> */}
    <Login/>
    </div>
  );
}

export default App;
