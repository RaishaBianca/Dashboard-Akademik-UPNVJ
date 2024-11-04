import { useForm, Link } from '@inertiajs/react';
import React from 'react';
import Input from '../Partial/Input';

const Login = () => {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
        remember: false
    });

    // Instead of direct form submission
const handleSubmit = (e) => {
    e.preventDefault();
    post('/login', {
        preserveScroll: true,
        onSuccess: () => {
            // Redirect to the dashboard
            <Link href="/dashboard" />;
        },
        onError: (errors) => {
            // Handle the errors
            console.log(errors);
        }
    });
};

    return (
        <div id="LoginPage">
            <div className="left">
                <h1>Portal Layanan Akademik</h1>
                <h4>UPN Veteran Jakarta</h4>
            </div>
            <div className='right'>
                <div className='form-div'>
                    <h1 className='title'>LOGIN</h1>
                    <form onSubmit={handleSubmit}>
                        <div>
                            <input
                                type="email"
                                name="email" 
                                value={data.email}
                                onChange={e => setData('email', e.target.value)}
                                placeholder="Email"
                                autoComplete="email"
                            />
                            {errors.email && <div className="error">{errors.email}</div>}
                        </div>

                        <div>
                            <input 
                                type="password"
                                name="password"
                                value={data.password}
                                onChange={e => setData('password', e.target.value)}
                                placeholder="Password"
                                autoComplete="current-password"
                            />
                            {errors.password && <div className="error">{errors.password}</div>}
                        </div>

                        <div>
                            <input
                                type="checkbox"
                                name="remember"
                                checked={data.remember}
                                onChange={e => setData('remember', e.target.checked)}
                            />
                            <label>Remember Me</label>
                        </div>

                        <button 
                            type="submit" 
                            className='submit-button'
                            disabled={processing}
                        >
                            {processing ? 'Logging in...' : 'Login'}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default Login;