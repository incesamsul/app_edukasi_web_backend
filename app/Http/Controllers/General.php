<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class General extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function dashboard()
    {
        return view('pages.dashboard.index');
    }

    public function profile()
    {
        $data['user'] = User::where('id', auth()->user()->id);
        $data['profile'] = Profile::where("id_user", auth()->user()->id)->first();
        return view('pages.profile.index', $data);
    }

    public function bantuan()
    {
        return view('pages.bantuan.index');
    }

    public function ubahData(Request $request)
    {
        $profile = Profile::where('id_user', auth()->user()->id);
        if ($profile->first()) {
            Profile::where('id_user', auth()->user()->id)->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
            ]);

            User::where('id', auth()->user()->id)->update([
                'name' => $request->nama
            ]);
            return redirect()->back()->with('message', 'berhasil di ubah');
        } else {
            Profile::create([
                'id_user' => auth()->user()->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nip' => $request->nip,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
            ]);

            return redirect()->back()->with('message', 'berhasil di ubah');
        }
    }

    public function ubahRole(Request $request)
    {
        User::where('id', auth()->user()->id)
            ->update(['role' => $request->post('role')]);
        return redirect()->back();
    }

    public function ubahFotoProfile(Request $request)
    {

        $extensions = ['jpg', 'jpeg', 'png'];

        $result = array($request->foto->getClientOriginalExtension());

        if (in_array($result[0], $extensions)) {
            $file = $request->foto;
        } else {
            return redirect()->back()->with('error', 'format file tidak di dukung');
        }

        // $fileName = auth()->user()->email . "." . $request->foto->extension();
        $fileName = uniqid() . "." . $request->foto->extension();
        $request->foto->move(public_path('data/foto_profile/' . $fileName . '/'), $fileName);

        // Storage::disk('uploads')->put($fileName, file_get_contents($request->foto->getRealPath()));

        User::where('id', auth()->user()->id)
            ->update(['foto' => $fileName]);
        return redirect()->back();
    }
}