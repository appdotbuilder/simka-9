import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';



const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Agama',
        href: '/agama',
    },
    {
        title: 'Tambah Agama',
        href: '/agama/create',
    },
];

export default function AgamaCreate() {
    const { data, setData, post, processing, errors } = useForm({
        kode: '',
        nama_agama: '',
        urut: 0,
        status: 'aktif' as 'aktif' | 'nonaktif',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('agama.store'));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Tambah Agama" />
            <div className="flex h-full flex-1 flex-col gap-6 p-6">
                {/* Header */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-800 dark:text-gray-200">➕ Tambah Data Agama</h1>
                        <p className="text-gray-600 dark:text-gray-400">Tambahkan data agama baru ke sistem</p>
                    </div>
                    <Link href={route('agama.index')}>
                        <Button variant="outline">
                            ← Kembali
                        </Button>
                    </Link>
                </div>

                {/* Form */}
                <div className="bg-white rounded-lg shadow border border-gray-200 p-6 dark:bg-gray-800 dark:border-gray-700">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {/* Kode */}
                            <div className="space-y-2">
                                <Label htmlFor="kode">Kode Agama *</Label>
                                <Input
                                    id="kode"
                                    type="text"
                                    value={data.kode}
                                    onChange={(e) => setData('kode', e.target.value)}
                                    placeholder="Contoh: ISL, KRT, KTL"
                                    maxLength={10}
                                    className={errors.kode ? 'border-red-300' : ''}
                                />
                                {errors.kode && (
                                    <p className="text-sm text-red-600">{errors.kode}</p>
                                )}
                            </div>

                            {/* Urutan */}
                            <div className="space-y-2">
                                <Label htmlFor="urut">Urutan *</Label>
                                <Input
                                    id="urut"
                                    type="number"
                                    value={data.urut}
                                    onChange={(e) => setData('urut', parseInt(e.target.value) || 0)}
                                    placeholder="Urutan tampil"
                                    min={0}
                                    className={errors.urut ? 'border-red-300' : ''}
                                />
                                {errors.urut && (
                                    <p className="text-sm text-red-600">{errors.urut}</p>
                                )}
                            </div>
                        </div>

                        {/* Nama Agama */}
                        <div className="space-y-2">
                            <Label htmlFor="nama_agama">Nama Agama *</Label>
                            <Input
                                id="nama_agama"
                                type="text"
                                value={data.nama_agama}
                                onChange={(e) => setData('nama_agama', e.target.value)}
                                placeholder="Masukkan nama agama"
                                maxLength={100}
                                className={errors.nama_agama ? 'border-red-300' : ''}
                            />
                            {errors.nama_agama && (
                                <p className="text-sm text-red-600">{errors.nama_agama}</p>
                            )}
                        </div>

                        {/* Status */}
                        <div className="space-y-2">
                            <Label htmlFor="status">Status *</Label>
                            <Select value={data.status} onValueChange={(value) => setData('status', value as 'aktif' | 'nonaktif')}>
                                <SelectTrigger className={errors.status ? 'border-red-300' : ''}>
                                    <SelectValue placeholder="Pilih status" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="aktif">Aktif</SelectItem>
                                    <SelectItem value="nonaktif">Non Aktif</SelectItem>
                                </SelectContent>
                            </Select>
                            {errors.status && (
                                <p className="text-sm text-red-600">{errors.status}</p>
                            )}
                        </div>

                        {/* Actions */}
                        <div className="flex items-center gap-4 pt-4">
                            <Button type="submit" disabled={processing} className="bg-blue-600 hover:bg-blue-700">
                                {processing ? '⏳ Menyimpan...' : '💾 Simpan'}
                            </Button>
                            <Link href={route('agama.index')}>
                                <Button type="button" variant="outline">
                                    ❌ Batal
                                </Button>
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </AppLayout>
    );
}