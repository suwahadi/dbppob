<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaction;

class TransactionExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Transaction::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID MEMBER',
            'KODE PRODUK',
            'NO TUJUAN',
            'TANGGAL',
            'BELI',
            'JUAL',
            'FORMAT TRANSAKSI',
            'STATUS',
            'RESPONSE',
            'ID TRX',
            'VSN',
            'SUPPLIER',
            'PELANGGAN',
            'PERIODE',
            'LAIN-LAIN',
            'ADMIN',
            'TOTAL TAGIHAN',
            'PAYMENT_ID',
            'IS_PAID',
        ];
    }

}