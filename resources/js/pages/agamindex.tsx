import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';

interface AgamaData {
    id: number;
    kode: string;
    nama_agama: string;
    urut: number;
    status: 'aktif' | 'nonaktif';
    created_at: string;
    updated_at: string;
    [key: string]: unknown;
}

interface PaginatedData {
    data: AgamaData[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    [key: string]: unknown;
}

interface Props {
    agamas: PaginatedData;
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Agama',
        href: '/agama',
    },
];

export default function AgamaIndex({ agamas }: Props) {
    const handleDelete = (id: number) => {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            router.delete(route('agama.destroy', id), {
                onSuccess: () => {
                    // Handle success if needed
                }
            });
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Data Agama" />
            <div className="flex h-full flex-1 flex-col gap-6 p-6">
                {/* Header */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-800 dark:text-gray-200">🕊️ Data Agama</h1>
                        <p className="text-gray-600 dark:text-gray-400">Kelola data master agama pegawai</p>
                    </div>
                    <Link href={route('agama.create')}>
                        <Button className="bg-blue-600 hover:bg-blue-700">
                            ➕ Tambah Agama
                        </Button>
                    </Link>
                </div>

                {/* Table */}
                <div className="bg-white rounded-lg shadow border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div className="overflow-x-auto">
                        <table className="w-full text-sm">
                            <thead className="bg-gray-50 border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                                <tr>
                                    <th className="px-6 py-3 text-left font-medium text-gray-900 dark:text-gray-100">No</th>
                                    <th className="px-6 py-3 text-left font-medium text-gray-900 dark:text-gray-100">Kode</th>
                                    <th className="px-6 py-3 text-left font-medium text-gray-900 dark:text-gray-100">Nama Agama</th>
                                    <th className="px-6 py-3 text-left font-medium text-gray-900 dark:text-gray-100">Urutan</th>
                                    <th className="px-6 py-3 text-left font-medium text-gray-900 dark:text-gray-100">Status</th>
                                    <th className="px-6 py-3 text-center font-medium text-gray-900 dark:text-gray-100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200 dark:divide-gray-600">
                                {agamas.data.length > 0 ? (
                                    agamas.data.map((agama, index) => (
                                        <tr key={agama.id} className="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td className="px-6 py-4 text-gray-900 dark:text-gray-100">
                                                {(agamas.current_page - 1) * agamas.per_page + index + 1}
                                            </td>
                                            <td className="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                                {agama.kode}
                                            </td>
                                            <td className="px-6 py-4 text-gray-900 dark:text-gray-100">
                                                {agama.nama_agama}
                                            </td>
                                            <td className="px-6 py-4 text-gray-900 dark:text-gray-100">
                                                {agama.urut}
                                            </td>
                                            <td className="px-6 py-4">
                                                <span className={`inline-flex px-2 py-1 text-xs font-medium rounded-full ${
                                                    agama.status === 'aktif' 
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300'
                                                        : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300'
                                                }`}>
                                                    {agama.status}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4">
                                                <div className="flex items-center justify-center gap-2">
                                                    <Link
                                                        href={route('agama.show', agama.id)}
                                                        className="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    >
                                                        👁️ Lihat
                                                    </Link>
                                                    <Link
                                                        href={route('agama.edit', agama.id)}
                                                        className="text-green-600 hover:text-green-800 text-sm font-medium"
                                                    >
                                                        ✏️ Edit
                                                    </Link>
                                                    <button
                                                        onClick={() => handleDelete(agama.id)}
                                                        className="text-red-600 hover:text-red-800 text-sm font-medium"
                                                    >
                                                        🗑️ Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ))
                                ) : (
                                    <tr>
                                        <td colSpan={6} className="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                            <div className="flex flex-col items-center gap-2">
                                                <span className="text-4xl">📝</span>
                                                <span>Belum ada data agama</span>
                                                <Link href={route('agama.create')}>
                                                    <Button className="mt-2 bg-blue-600 hover:bg-blue-700">
                                                        ➕ Tambah Data Pertama
                                                    </Button>
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                        </table>
                    </div>

                    {/* Pagination */}
                    {agamas.last_page > 1 && (
                        <div className="px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                            <div className="flex items-center justify-between">
                                <div className="text-sm text-gray-500 dark:text-gray-400">
                                    Menampilkan {(agamas.current_page - 1) * agamas.per_page + 1} hingga{' '}
                                    {Math.min(agamas.current_page * agamas.per_page, agamas.total)} dari{' '}
                                    {agamas.total} data
                                </div>
                                <div className="flex gap-2">
                                    {agamas.current_page > 1 && (
                                        <Link
                                            href={route('agama.index', { page: agamas.current_page - 1 })}
                                            className="px-3 py-1 text-sm bg-gray-200 hover:bg-gray-300 rounded dark:bg-gray-600 dark:hover:bg-gray-500"
                                        >
                                            ← Sebelumnya
                                        </Link>
                                    )}
                                    {agamas.current_page < agamas.last_page && (
                                        <Link
                                            href={route('agama.index', { page: agamas.current_page + 1 })}
                                            className="px-3 py-1 text-sm bg-gray-200 hover:bg-gray-300 rounded dark:bg-gray-600 dark:hover:bg-gray-500"
                                        >
                                            Selanjutnya →
                                        </Link>
                                    )}
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}