<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kelas;
use App\Models\Province;
use App\Models\Siswa;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['kelas'] = Kelas::count();
        $data['siswa'] = Siswa::count();
        $data['berita'] = Berita::count();
        $data['galeri'] = Galeri::count();

        $data_donuts = Siswa::select(DB::raw("COUNT(id) as total"))->groupBy('kelas_id')->orderBy('kelas_id', 'ASC')->pluck('total');
        $label_donuts = Kelas::orderBy('kelas.id', 'ASC')->join('siswa', 'siswa.kelas_id', '=', 'kelas.id')->groupBy('nama_kelas')->pluck('nama_kelas');

        $label_bar = ['Siswa'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = '#458af7';
            $data_bar[$key]['borderColor'] = '#458af7';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                $data_month[] = Siswa::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
            }

            $data_bar[$key]['data'] = $data_month;
        }


        return view('admin.dashboard', compact('data', 'data_donuts', 'label_donuts', 'label_bar', 'data_bar'));
    }

    public function profile($id)
    {
        $user = User::with('siswa.province')->findOrFail($id);
        $provinces = Province::pluck('name', 'id');
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('settings.profile', compact('user', 'provinces', 'kelas'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::with('siswa')->findOrFail($id);

        if ($request->has('avatar')) {
            $this->validate($request, [
                'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:4096']
            ]);

            DB::transaction(function () use ($request, $user) {
                $avatar = public_path('/avatars/') . $user->avatar;
                if (file_exists($avatar)) {
                    @unlink($avatar);
                }

                $avatarName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move(public_path() . '/' . ('avatars'), $avatarName);

                if(!empty($user->siswa_id)) {
                    $siswa = Siswa::where('id', $user->siswa_id)->first();
                    $this->validate($request, [
                        'nis' => ['required', 'numeric', 'unique:siswa,nis,'.$user->siswa->id],
                        'nama_lengkap' => ['required', 'string', 'max:64'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:siswa,email,'.$user->siswa->id],
                        'jenis_kelamin' => ['required', 'string', 'max:12'],
                        'agama' => ['required', 'string', 'max:24'],
                        'tempat_lahir' => ['required', 'string', 'max:255'],
                        'tanggal_lahir' => ['required', 'date'],
                        'rt' => ['required', 'numeric'],
                        'rw' => ['required', 'numeric'],
                        'no_rumah' => ['required', 'numeric'],
                        'province_id' => ['required', 'integer'],
                        'regency_id' => ['required', 'integer'],
                        'district_id' => ['required', 'integer'],
                        'village_id' => ['required', 'integer'],
                        'kode_pos' => ['required', 'numeric'],
                        'jalan' => ['required', 'max:300', 'string'],
                        'no_hp' => ['required', 'string', 'max:14'],
                    ]);
                    
                    $siswa->update($request->all());

                    $user->update([
                        'name' => $request->nama_lengkap,
                        'email' => $request->email,
                        'avatar' => $avatarName
                    ]);
                }else {
                    $this->validate($request, [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                    ]);
                    
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'avatar' => $avatarName
                    ]);
                }
            });
        } else {
            DB::transaction(function () use ($request, $user) {
                if(!empty($user->siswa_id)){
                    $siswa = Siswa::where('id', $user->siswa_id)->first();
                    $this->validate($request, [
                        'nis' => ['required', 'numeric', 'unique:siswa,nis,'.$user->siswa->id],
                        'nama_lengkap' => ['required', 'string', 'max:64'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:siswa,email,'.$user->siswa->id],
                        'jenis_kelamin' => ['required', 'string', 'max:12'],
                        'agama' => ['required', 'string', 'max:24'],
                        'tempat_lahir' => ['required', 'string', 'max:255'],
                        'tanggal_lahir' => ['required', 'date'],
                        'rt' => ['required', 'numeric'],
                        'rw' => ['required', 'numeric'],
                        'no_rumah' => ['required', 'numeric'],
                        'province_id' => ['required', 'integer'],
                        'regency_id' => ['required', 'integer'],
                        'district_id' => ['required', 'integer'],
                        'village_id' => ['required', 'integer'],
                        'kode_pos' => ['required', 'numeric'],
                        'jalan' => ['required', 'max:300', 'string'],
                        'no_hp' => ['required', 'string', 'max:14'],
                    ]);
                    $siswa->update($request->all());

                    $user->update([
                        'name' => $request->nama_lengkap,
                        'email' => $request->email
                    ]);
                }else {
                    $this->validate($request, [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                    ]);

                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email
                    ]);
                }
            });
        }

        return redirect()->route('profile', $user->id)->withSuccess('Profile Berhasil Diperbarui');
    }

    public function changePassword()
    {
        return view('settings.changePassword');
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->withSuccess('Password berhasil diperbarui!');
    }
}
