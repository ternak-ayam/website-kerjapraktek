@extends('rootPages.DashboardAdminApp')
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols- gap-6 xl:grid-cols-1">

            <!-- update section -->
            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="p-8">
                        @if ($message = Session::get('errors'))
                            <div class="alert alert-error alert-close">
                                <button class="alert-btn-close">
                                    <i class="fad fa-times"></i>
                                </button>
                                <span>{{ $message }}</span>
                            </div>
                        @endif
                        <form action="{{ route('adminNilai.update', $data->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">ID
                                        Mahasiswa</label>
                                    <select name="kerja_praktek_id" id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        readonly>

                                        <option value="{{ old('kerja_praktek_id', $data->kerja_praktek_id) }}""
                                            data-mahasiswa="{{ $data->kerjapraktek->nama_lengkap }}">
                                            {{ old('kerja_praktek_id', $data->kerjapraktek->user_id) }}
                                        </option>
                                    </select>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Mahasiswa</label>
                                    <input type="text" id="input_mahasiswa"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="2986 Kaden Tunnel Suite 373 Kuphalville, KS 28321" readonly
                                        value="{{ old('user_id', $data->kerjapraktek->user->nama_lengkap) }}">
                                </div>
                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">ID
                                        Pembina</label>
                                    <select name="admin_id" id="pembina_admin"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value="{{ old('kerja_praktek_id', $data->kerjapraktek->pembina_id) }}">
                                            {{ old('kerja_praktek_id',$data->kerjapraktek->pembina_id) }}
                                        </option>
                                        {{-- @foreach ($pembina as $item)
                                            <option value="{{ $item->admin_id }}"
                                                data-bidang-kerja="{{ $item->bidang_kerja }}"
                                                data-pembina="{{ $item->admin->nama }}">
                                                {{ $item->admin_id }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Pembina</label>
                                    <input type="text" id="input_pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      readonly
                                        @if ($data->kerjapraktek->pembina == null)
                                        value="Pembina Belum Ditentukan"
                                        @else
                                        value="{{

                                            old('admin_id', $data->kerjapraktek->pembina->nama_pembina) }}"
                                        @endif
                                       >
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Nama Bidang Kerja</label>
                                    <select name="bidang_kerja" id="pembina"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($kerjapraktek as $item)
                                            <option value="{{ $item->bidang_kerja}}" @if($item->bidang_kerja == $data->kerjapraktek['bidang_kerja']) selected @endif>
                                                {{ $item->bidang_kerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Sopan Santun dan Etika</label>
                                    <input type="number" name="nilai_sopan_santun"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe" value="{{ old('kerja_praktek_id',$data->nilai_sopan_santun) }}" required>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Dedikasi Terhadap Tugas</label>
                                    <input type="number" name="nilai_dedikasi"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_dedikasi) }}" required>
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Presensi Kehadiran</label>
                                    <input type="number" name="nilai_presensi_kehadiran"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_presensi_kehadiran) }}" required>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Tanggung Jawab</label>
                                    <input type="number" name="nilai_tanggung_jawab"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_tanggung_jawab) }}" required>
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Kemampuan Bekerjasama</label>
                                    <input type="number" name="nilai_kemampuan_bekerjasama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_kemampuan_bekerjasama) }}" required>
                                </div>
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Prakarsa/Inisiatif</label>
                                    <input type="number" name="nilai_prakarsa"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_prakarsa) }}" required>
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Skill / Kompetensi Teknis</label>
                                    <input type="number" name="nilai_skill"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe"  value="{{ old('kerja_praktek_id',$data->nilai_skill) }}" required>
                                </div>

                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="w-full mx-4">
                                    <label for="first_name"
                                        class="block mb-2  text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <textarea  name="keterangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="keterangan" required>{{ old('keterangan', $data->keterangan) }}</textarea>
                                </div>
                            </div>
                            <div class="flex flex-row md:flex-col my-2">
                                <div class="grow w-full mx-4">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:my-2 p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </div>
                                <div class="grow w-full mx-4">
                                    <a href="{{ route('adminNilai') }}">
                                        <button type="button"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:my-2 p-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</button>
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- end update section -->
                </div>
                <!-- end Analytics -->
            </div>
            <!-- end content -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script>
                // Ambil dari atribut data
                $(document).ready(function() {
                    $('#pembina').on('change', function() {
                        const selected = $(this).find('option:selected');
                        const mahasiswa = selected.data('mahasiswa');

                        $("#input_mahasiswa").val(mahasiswa);
                    });
                    $('#pembina_admin').on('change', function() {
                        const selected = $(this).find('option:selected');
                        const pembina = selected.data('pembina');
                        const bidang_kerja = selected.data('bidang-kerja');

                        $("#input_pembina").val(pembina);
                        $("#input_bidang_kerja").val(bidang_kerja);
                    });
                });
            </script>
        @endsection
