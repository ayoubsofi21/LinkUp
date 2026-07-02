import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "../context/AuthContext";

export default function Register() {
  const navigate = useNavigate();

  const { register } = useAuth();

  const [loading, setLoading] = useState(false);

  const [errors, setErrors] = useState({});

  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
  });

  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    console.log("Submitting form...");
    console.log(form);

    try {
      await register(form);
      console.log("Register success");
      navigate("/dashboard");
    } catch (error) {
      console.log("ERROR:", error);
      console.log("STATUS:", error.response?.status);
      console.log("DATA:", error.response?.data);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500">
      <div className="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-10">
        <div className="text-center mb-8">
          <h1 className="text-4xl font-bold text-blue-600">LinkUp</h1>

          <p className="text-gray-500 mt-2">Create your account</p>
        </div>

        <form onSubmit={handleSubmit} className="space-y-5">
          <input
            name="name"
            placeholder="Full Name"
            value={form.name}
            onChange={handleChange}
            className="w-full border rounded-xl p-3"
          />

          {errors.name && (
            <p className="text-red-500 text-sm">{errors.name[0]}</p>
          )}

          <input
            name="email"
            placeholder="Email Address"
            value={form.email}
            onChange={handleChange}
            className="w-full border rounded-xl p-3"
          />

          {errors.email && (
            <p className="text-red-500 text-sm">{errors.email[0]}</p>
          )}

          <input
            type="password"
            name="password"
            placeholder="Password"
            value={form.password}
            onChange={handleChange}
            className="w-full border rounded-xl p-3"
          />

          {errors.password && (
            <p className="text-red-500 text-sm">{errors.password[0]}</p>
          )}

          <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm Password"
            value={form.password_confirmation}
            onChange={handleChange}
            className="w-full border rounded-xl p-3"
          />

          <button
            disabled={loading}
            className="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl transition"
          >
            {loading ? "Creating..." : "Create Account"}
          </button>
        </form>

        <div className="text-center mt-6">
          <p className="text-gray-500">
            Already have an account?
            <Link to="/login" className="ml-2 text-blue-600 font-semibold">
              Login
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
}
