import Navbar from "../components/Navbar";

export default function Home() {
  return (
    <>
      <Navbar />

      <div className="min-h-[90vh] flex items-center justify-center">
        <div className="bg-white rounded-2xl shadow-xl p-12 text-center">
          <h1 className="text-5xl font-bold text-blue-600">LinkUp</h1>

          <p className="mt-4 text-gray-600">
            Laravel 12 + React Authentication
          </p>
        </div>
      </div>
    </>
  );
}
