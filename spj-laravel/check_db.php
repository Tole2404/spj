<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Kegiatan;
use App\Models\Konsumsi;
use App\Models\Unor;
use App\Models\UnitKerja;

echo "=== DATABASE CHECK ===\n\n";

echo "UNOR:\n";
foreach (Unor::all() as $u) {
    echo "  ID:{$u->id} - {$u->kode_unor} - {$u->nama_unor}\n";
}

echo "\nUNIT KERJA:\n";
foreach (UnitKerja::take(5)->get() as $uk) {
    echo "  ID:{$uk->id} - {$uk->nama_unit} (Unor:{$uk->unor_id})\n";
}

echo "\nKEGIATAN:\n";
foreach (Kegiatan::with(['unor', 'unitKerja'])->get() as $k) {
    $unor = $k->unor ? $k->unor->nama_unor : 'NULL';
    $uk = $k->unitKerja ? $k->unitKerja->nama_unit : 'NULL';
    echo "  ID:{$k->id} - {$k->nama_kegiatan} | Unor:{$k->unor_id}({$unor}) | UK:{$k->unit_kerja_id}({$uk})\n";
}

echo "\nKONSUMSI:\n";
foreach (Konsumsi::all() as $c) {
    echo "  ID:{$c->id} - {$c->nama_konsumsi} ({$c->kategori}) - Qty:{$c->jumlah} x Rp{$c->harga}\n";
}
