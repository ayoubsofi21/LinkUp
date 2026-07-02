import Navbar from "../components/Navbar";
import { useAuth } from "../context/AuthContext";

export default function Dashboard() {
  const { user } = useAuth();

  return (
    <>
      <Navbar />

      <div className="container">
        <h1>Dashboard</h1>

        <h2>Welcome {user?.name}</h2>

        <p>Email : {user?.email}</p>
      </div>
    </>
  );
}
