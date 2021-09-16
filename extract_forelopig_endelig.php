<?php

set_error_handler(function ($errno, $errstr, $errfile, $errline, array $errcontext) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

$downloads = explode("\n", '2021-09-13__2252
2021-09-13__2327
2021-09-13__2332
2021-09-13__2344
2021-09-13__2348
2021-09-13__2353
2021-09-14__0001
2021-09-14__0008
2021-09-14__0015
2021-09-14__0023
2021-09-14__0030
2021-09-14__0036
2021-09-14__0045
2021-09-14__0053
2021-09-14__0114
2021-09-14__0127
2021-09-14__0135
2021-09-14__0228
2021-09-14__0335
2021-09-14__0443
2021-09-14__0550
2021-09-14__0657
2021-09-14__0804
2021-09-14__0837
2021-09-14__0854
2021-09-14__0911
2021-09-14__0928
2021-09-14__0945
2021-09-14__1002
2021-09-14__1019
2021-09-14__1036
2021-09-14__1053
2021-09-14__1112
2021-09-14__1129
2021-09-14__1146
2021-09-14__1204
2021-09-14__1221
2021-09-14__1238
2021-09-14__1255
2021-09-14__1313
2021-09-14__1330
2021-09-14__1347
2021-09-14__1455
2021-09-14__1603
2021-09-14__1710
2021-09-14__1817
2021-09-14__1924
2021-09-14__2031
2021-09-14__2138
2021-09-14__2245
2021-09-14__2353
2021-09-15__0100
2021-09-15__0207
2021-09-15__0314
2021-09-15__0421
2021-09-15__0528
2021-09-15__0635
2021-09-15__0742
2021-09-15__0849
2021-09-15__0956
2021-09-15__1059
2021-09-15__1206
2021-09-15__1314
2021-09-15__1421
2021-09-15__1528
2021-09-15__1635
2021-09-15__1742
2021-09-15__1849
2021-09-15__1957
2021-09-15__2104
2021-09-15__2211
2021-09-15__2318
2021-09-16__0027
2021-09-16__0134
2021-09-16__0241
2021-09-16__0348
2021-09-16__0456
2021-09-16__0603
2021-09-16__0710
2021-09-16__0817
2021-09-16__0924
2021-09-16__1031
2021-09-16__1139
2021-09-16__1246
2021-09-16__1353
2021-09-16__1500
2021-09-16__1608
2021-09-16__1715
2021-09-16__1822
2021-09-16__1929
2021-09-16__2036
2021-09-16__2143');

$kretsTotal = 0;
$kretsForelopig = 0;
$kretsEndelig = 0;
$kretsForelopigOgEndelig = 0;

$kretsDiff = array();
$kretsDiff2 = array();

$kretser = explode("\n", file_get_contents(__DIR__ . '/kretser.txt'));
foreach ($kretser as $krets) {
    if ($krets == '') {
        continue;
    }
    $forelopig100_endelig0 = false;
    $forelopig100_endelig0_obj = null;
    $endelig100 = false;
    $endelig100_obj = null;
    foreach ($downloads as $download) {
        $filename = __DIR__ . '/../' . $download . '/' . $krets . '.json';
        $kretsObj = json_decode(file_get_contents($filename));
        echo $krets . ' - ' . $download . ':     foreløpig ' . $kretsObj->opptalt->forelopig . '     endelig ' . $kretsObj->opptalt->endelig . "\n";

        if (!$forelopig100_endelig0 && $kretsObj->opptalt->forelopig == 100 && $kretsObj->opptalt->endelig == 0) {
            file_put_contents(__DIR__ . '/forelopig100_endelig0/' . $krets . '.json', file_get_contents($filename));
            $forelopig100_endelig0 = true;
            $forelopig100_endelig0_obj = $kretsObj;
        }
        if ($kretsObj->opptalt->endelig == 100) {
            file_put_contents(__DIR__ . '/endelig100/' . $krets . '.json', file_get_contents($filename));
            $endelig100 = true;
            $endelig100_obj = $kretsObj;
            break;
        }
    }

    $kretsTotal++;
    if ($forelopig100_endelig0) {
        $kretsForelopig++;
    }
    if ($endelig100) {
        $kretsEndelig++;
    }
    if ($forelopig100_endelig0 && $endelig100) {
        $kretsForelopigOgEndelig++;
    }

    if ($forelopig100_endelig0 && $endelig100) {
        $partiDiff = array();
        $partiDiff2 = array();
        foreach ($forelopig100_endelig0_obj->partier as $parti) {
            $diffFound = false;
            $diff = null;
            foreach ($endelig100_obj->partier as $partiEndelig) {
                if ($parti->id->partikode == $partiEndelig->id->partikode) {
                    $diffFound = true;
                    $diff = $partiEndelig->stemmer->resultat->antall->total - $parti->stemmer->resultat->antall->total;
                }
            }
            if (!$diffFound) {
                throw new Exception('Inconsistency.');
            }
            if ($diff != 0) {
                $partiDiff[$parti->id->partikode] = $diff;
            }
            if (abs($diff) >= 10) {
                $partiDiff2[$parti->id->partikode] = $diff;
            }

        }

        if (count($partiDiff) != 0) {
            file_put_contents(__DIR__ . '/diff_partistemmer/' . $krets . '.json', json_encode($partiDiff, JSON_PRETTY_PRINT ^ JSON_UNESCAPED_SLASHES ^ JSON_UNESCAPED_UNICODE));
            $kretsDiff[$krets] = $partiDiff;
        }
        if (count($partiDiff2) != 0) {
            file_put_contents(__DIR__ . '/diff_partistemmer_over10/' . $krets . '.json', json_encode($partiDiff2, JSON_PRETTY_PRINT ^ JSON_UNESCAPED_SLASHES ^ JSON_UNESCAPED_UNICODE));
            $kretsDiff2[$krets] = $partiDiff2;
        }
    }
}

var_dump($kretsDiff2);

echo 'Totalt kretser ................. : ' . $kretsTotal . "\n";
echo 'Forløpig 100%, endelig 0% ...... : ' . $kretsForelopig . "\n";
echo 'Endelig 100% ................... : ' . $kretsEndelig . "\n";
echo 'Data for foreløpig og endelig .. : ' . $kretsForelopigOgEndelig . "\n";
echo "\n";
echo "(^ Krets = nasjonalt, fylke, kommune og kretser i kommune. Får nok bare kretsnivå med både foreløpig og endelig)\n";
