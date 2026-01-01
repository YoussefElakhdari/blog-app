import { Link } from "react-router-dom"
export const Navbar=()=>{
    return(
        <>
        <h1>this a navbar</h1>
            <Link to="/Login">Login</Link>
            <Link to="/Register">Register</Link>
            <Link to="/Home">Home</Link>
        </>
    )
}