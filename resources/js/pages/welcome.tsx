import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="SIMKA-9 - Sistem Kepegawaian">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:from-gray-900 dark:to-gray-800">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-6xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white shadow-lg hover:bg-blue-700 transition-colors"
                            >
                                📊 Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 shadow hover:bg-gray-50 transition-colors dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
                                >
                                    🔐 Masuk
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white shadow-lg hover:bg-blue-700 transition-colors"
                                >
                                    📝 Daftar
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-6xl lg:flex-row lg:gap-12">
                        <div className="flex-1 rounded-2xl bg-white p-8 pb-12 shadow-xl border border-gray-200 lg:p-12 dark:bg-gray-800 dark:border-gray-700">
                            <div className="text-center mb-8">
                                <h1 className="mb-4 text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    🏢 SIMKA-9
                                </h1>
                                <p className="text-xl text-gray-600 dark:text-gray-300 mb-2">
                                    Sistem Kepegawaian Modern
                                </p>
                                <p className="text-lg text-gray-500 dark:text-gray-400">
                                    Solusi lengkap untuk manajemen data kepegawaian yang efisien dan terintegrasi
                                </p>
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div className="bg-blue-50 rounded-xl p-6 border border-blue-200 dark:bg-blue-900/20 dark:border-blue-800">
                                    <div className="flex items-center gap-3 mb-3">
                                        <div className="p-2 bg-blue-100 rounded-lg dark:bg-blue-800">
                                            <span className="text-xl">🏛️</span>
                                        </div>
                                        <h3 className="font-semibold text-gray-800 dark:text-gray-200">Master Data</h3>
                                    </div>
                                    <ul className="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Data Agama</li>
                                        <li>• Data Pendidikan</li>
                                        <li>• Data Unit Kerja</li>
                                        <li>• Data Jabatan</li>
                                    </ul>
                                </div>

                                <div className="bg-green-50 rounded-xl p-6 border border-green-200 dark:bg-green-900/20 dark:border-green-800">
                                    <div className="flex items-center gap-3 mb-3">
                                        <div className="p-2 bg-green-100 rounded-lg dark:bg-green-800">
                                            <span className="text-xl">⚡</span>
                                        </div>
                                        <h3 className="font-semibold text-gray-800 dark:text-gray-200">Fitur Unggulan</h3>
                                    </div>
                                    <ul className="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Interface Modern & Responsif</li>
                                        <li>• Sidebar Navigation</li>
                                        <li>• Sistem Autentikasi Aman</li>
                                        <li>• Manajemen Status Data</li>
                                    </ul>
                                </div>

                                <div className="bg-purple-50 rounded-xl p-6 border border-purple-200 dark:bg-purple-900/20 dark:border-purple-800">
                                    <div className="flex items-center gap-3 mb-3">
                                        <div className="p-2 bg-purple-100 rounded-lg dark:bg-purple-800">
                                            <span className="text-xl">📋</span>
                                        </div>
                                        <h3 className="font-semibold text-gray-800 dark:text-gray-200">Manajemen Data</h3>
                                    </div>
                                    <ul className="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Tambah, Edit, Hapus Data</li>
                                        <li>• Pencarian & Filter</li>
                                        <li>• Validasi Form Otomatis</li>
                                        <li>• Relasi Data Terintegrasi</li>
                                    </ul>
                                </div>

                                <div className="bg-orange-50 rounded-xl p-6 border border-orange-200 dark:bg-orange-900/20 dark:border-orange-800">
                                    <div className="flex items-center gap-3 mb-3">
                                        <div className="p-2 bg-orange-100 rounded-lg dark:bg-orange-800">
                                            <span className="text-xl">🔒</span>
                                        </div>
                                        <h3 className="font-semibold text-gray-800 dark:text-gray-200">Keamanan</h3>
                                    </div>
                                    <ul className="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Autentikasi Admin</li>
                                        <li>• Session Management</li>
                                        <li>• Data Validation</li>
                                        <li>• CSRF Protection</li>
                                    </ul>
                                </div>
                            </div>

                            <div className="text-center">
                                {!auth.user && (
                                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                        <Link
                                            href={route('login')}
                                            className="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-8 py-3 text-lg font-medium text-white shadow-lg hover:bg-blue-700 transition-all transform hover:scale-105"
                                        >
                                            🚀 Mulai Sekarang
                                        </Link>
                                        <div className="text-sm text-gray-500 flex items-center justify-center gap-1 dark:text-gray-400">
                                            <span>Demo: admin / password</span>
                                        </div>
                                    </div>
                                )}
                                {auth.user && (
                                    <Link
                                        href={route('dashboard')}
                                        className="inline-flex items-center justify-center gap-2 rounded-lg bg-green-600 px-8 py-3 text-lg font-medium text-white shadow-lg hover:bg-green-700 transition-all transform hover:scale-105"
                                    >
                                        ⚡ Dashboard
                                    </Link>
                                )}
                            </div>

                            <footer className="mt-12 pt-6 border-t border-gray-200 text-center text-sm text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                SIMKA-9 - Sistem Kepegawaian yang mudah, cepat, dan terpercaya
                            </footer>
                        </div>
                        <div className="hidden lg:flex lg:flex-1 items-center justify-center">
                            <div className="text-center space-y-6">
                                <div className="text-8xl">🏢</div>
                                <div className="text-2xl font-bold text-gray-700 dark:text-gray-300">
                                    Modern HR System
                                </div>
                                <div className="text-gray-500 dark:text-gray-400">
                                    Kelola data kepegawaian dengan mudah dan efisien
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div className="hidden h-14.5 lg:block"></div>
            </div>
        </>
    );
}