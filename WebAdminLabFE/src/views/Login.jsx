import React from 'react';
import Input from '../partials/Input';

export default function Login() {
    return (
        <div id="LoginPage">
            <div className="left">
                    <h1>Portal Layanan Akademik</h1>
                    <h4>UPN Veteran Jakarta</h4>
            </div>
            <div className='right'>
                <div className='form-div'>
                    <h1 className='title'>LOGIN</h1>
                    <form>
                        <Input type="text" name="username" placeholder="Username" />
                        <Input type="password" name="password" placeholder="Password" />
                        <button type="submit" className='submit-button'>Login</button>
                    </form>
                </div>
            </div>
        </div>
    );
  }