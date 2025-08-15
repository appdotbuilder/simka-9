import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    const masterDataModules = [
        {
            title: 'Agama',
            description: 'Kelola data master agama pegawai',
            icon: '🕊️',
            route: 'agama.index',
            color: 'from-blue-500 to-blue-600'
        },
        {
            title: 'Pendidikan',
            description: 'Kelola data master tingkat pendidikan',
            icon: '🎓',
            route: 'pendidikan.index',
            color: 'from-green-500 to-green-600'
        },
        {
            title: 'Unit Kerja',
            description: 'Kelola data master unit kerja',
            icon: '🏢',
            route: 'unit-kerja.index',
            color: 'from-purple-500 to-purple-600'
        },
        {
            title: 'Jabatan',
            description: 'Kelola data master jabatan pegawai',
            icon: '👔',
            route: 'jabatan.index',
            color: 'from-orange-500 to-orange-600'
        }
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard SIMKA-9" />
            <div className="flex h-full flex-1 flex-col gap-6 p-6 overflow-x-auto">
                {/* Welcome Header */}
                <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white">
                    <div className="flex items-center gap-4">
                        <div className="text-5xl">🏢</div>
                        <div>
                            <h1 className="text-3xl font-bold mb-2">Selamat Datang di SIMKA-9</h1>
                            <p className="text-blue-100">Sistem Kepegawaian - Kelola data master kepegawaian dengan mudah dan efisien</p>
                        </div>
                    </div>
                </div>

                {/* Statistics Cards */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center gap-4">
                            <div className="p-3 bg-blue-100 rounded-lg dark:bg-blue-900/30">
                                <span className="text-2xl">🕊️</span>
                            </div>
                            <div>
                                <h3 className="font-semibold text-gray-800 dark:text-gray-200">Data Agama</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Master data agama</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center gap-4">
                            <div className="p-3 bg-green-100 rounded-lg dark:bg-green-900/30">
                                <span className="text-2xl">🎓</span>
                            </div>
                            <div>
                                <h3 className="font-semibold text-gray-800 dark:text-gray-200">Data Pendidikan</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Master data pendidikan</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center gap-4">
                            <div className="p-3 bg-purple-100 rounded-lg dark:bg-purple-900/30">
                                <span className="text-2xl">🏢</span>
                            </div>
                            <div>
                                <h3 className="font-semibold text-gray-800 dark:text-gray-200">Data Unit Kerja</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Master data unit kerja</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center gap-4">
                            <div className="p-3 bg-orange-100 rounded-lg dark:bg-orange-900/30">
                                <span className="text-2xl">👔</span>
                            </div>
                            <div>
                                <h3 className="font-semibold text-gray-800 dark:text-gray-200">Data Jabatan</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Master data jabatan</p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Master Data Modules */}
                <div className="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div className="mb-6">
                        <h2 className="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-2">📊 Master Data</h2>
                        <p className="text-gray-600 dark:text-gray-400">Kelola semua data master untuk sistem kepegawaian</p>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        {masterDataModules.map((module, index) => (
                            <Link
                                key={index}
                                href={route(module.route)}
                                className="group relative overflow-hidden rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-lg"
                            >
                                <div className={`absolute inset-0 bg-gradient-to-br ${module.color} opacity-90 group-hover:opacity-100 transition-opacity`} />
                                <div className="relative z-10 text-white">
                                    <div className="text-3xl mb-4">{module.icon}</div>
                                    <h3 className="text-xl font-bold mb-2">{module.title}</h3>
                                    <p className="text-sm opacity-90">{module.description}</p>
                                    <div className="mt-4 flex items-center gap-2 text-sm">
                                        <span>Kelola Data</span>
                                        <span className="group-hover:translate-x-1 transition-transform">→</span>
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <h3 className="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">⚡ Aksi Cepat</h3>
                        <div className="space-y-3">
                            <Link
                                href={route('agama.create')}
                                className="flex items-center gap-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors dark:bg-blue-900/30 dark:hover:bg-blue-900/50"
                            >
                                <span className="text-xl">➕</span>
                                <span className="font-medium text-blue-700 dark:text-blue-300">Tambah Data Agama</span>
                            </Link>
                            <Link
                                href={route('unit-kerja.create')}
                                className="flex items-center gap-3 p-3 rounded-lg bg-purple-50 hover:bg-purple-100 transition-colors dark:bg-purple-900/30 dark:hover:bg-purple-900/50"
                            >
                                <span className="text-xl">🏢</span>
                                <span className="font-medium text-purple-700 dark:text-purple-300">Tambah Unit Kerja</span>
                            </Link>
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <h3 className="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">ℹ️ Informasi Sistem</h3>
                        <div className="space-y-3 text-sm">
                            <div className="flex justify-between">
                                <span className="text-gray-600 dark:text-gray-400">Versi Sistem</span>
                                <span className="font-medium">SIMKA-9 v1.0</span>
                            </div>
                            <div className="flex justify-between">
                                <span className="text-gray-600 dark:text-gray-400">Status</span>
                                <span className="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs dark:bg-green-900/30 dark:text-green-300">
                                    🟢 Aktif
                                </span>
                            </div>
                            <div className="flex justify-between">
                                <span className="text-gray-600 dark:text-gray-400">Framework</span>
                                <span className="font-medium">Laravel + React</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}