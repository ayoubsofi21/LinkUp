import { createContext, useContext, useEffect, useState } from "react";
import api from "../services/api";

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);

  // Get authenticated user
  const getUser = async () => {
    try {
      const response = await api.get("/api/user");
      setUser(response.data);
    } catch (error) {
      setUser(null);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    getUser();
  }, []);

  // Register
  const register = async (data) => {
    await api.get("/sanctum/csrf-cookie");

    const response = await api.post("/register", data);

    console.log("Register:", response.data);

    await getUser();
  };

  // Login
  const login = async (data) => {
    await api.get("/sanctum/csrf-cookie");

    const response = await api.post("/login", data);

    console.log("Login:", response.data);

    await getUser();
  };

  // Logout
  const logout = async () => {
    await api.post("/logout");
    setUser(null);
  };

  return (
    <AuthContext.Provider
      value={{
        user,
        loading,
        login,
        register,
        logout,
        getUser,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => useContext(AuthContext);
