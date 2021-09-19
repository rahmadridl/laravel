<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;

class Members extends Component
{
    public $members, $name, $price, $member_id;
    public $isModal;

    public function render()
    {
        $this->members = Member::orderBy('created_at', 'DESC')->get();
        return view('livewire.members');
    }

    public function create(){
        $this->resetFields();
        $this->openModal();

    }

    public function resetFields(){
        $this->name = '';
        $this->price = '';
    }

    public function openModal(){
        $this->isModal = true;
    }

    public function closeModal(){
        $this->isModal = false;
    }

    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'name' => 'required|string',
            'price' => 'required',
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Member::updateOrCreate(['id' => $this->member_id], [
            'name' => $this->name,
            'price' => $this->harga,
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->member_id ? $this->name . ' Diperbaharui': $this->name . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
    public function edit($id)
    {
        $member = Member::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->member_id = $id;
        $this->name = $member->name;
        $this->price = $member->price;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $member = Member::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $member->delete(); //LALU HAPUS DATA
        session()->flash('message', $member->name . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

}
