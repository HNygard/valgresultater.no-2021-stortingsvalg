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
2021-09-16__2143
2021-09-16__2251
2021-09-16__2358
2021-09-17__0105
2021-09-17__0212
2021-09-17__0319
2021-09-17__0426
2021-09-17__0534
2021-09-17__0641
2021-09-17__0748
2021-09-17__0855
2021-09-17__1002
2021-09-17__1109
2021-09-17__1216
2021-09-17__1323
2021-09-17__1430
2021-09-17__1537
2021-09-17__1644
2021-09-17__1751
2021-09-17__1858
2021-09-17__2005
2021-09-17__2112
2021-09-17__2255
2021-09-18__0002
2021-09-18__0109
2021-09-18__0216
2021-09-18__0323
2021-09-18__0431
2021-09-18__0537
2021-09-18__0644
2021-09-18__0751
2021-09-18__0858
2021-09-18__1005
2021-09-18__1112
2021-09-18__1219
2021-09-18__1326
2021-09-18__1433
2021-09-18__1540
2021-09-18__1647
2021-09-18__1754
2021-09-18__1901
2021-09-18__2008
2021-09-18__2115
2021-09-18__2222
2021-09-18__2330
2021-09-19__0038
2021-09-19__0145
2021-09-19__0251
2021-09-19__0358
2021-09-19__0505
2021-09-19__0612
2021-09-19__0719
2021-09-19__0826
2021-09-19__0933
2021-09-19__1040
2021-09-19__1147
2021-09-19__1254
2021-09-19__1401
2021-09-19__1508
2021-09-19__1615
2021-09-19__1722
2021-09-19__1829
2021-09-19__1936
2021-09-19__2043
2021-09-19__2149
2021-09-19__2256
2021-09-20__0004
2021-09-20__0139
2021-09-20__0246
2021-09-20__0353
2021-09-20__0500
2021-09-20__0607
2021-09-20__0713
2021-09-20__0820
2021-09-20__0928
2021-09-20__1035
2021-09-20__1142
2021-09-20__1249
2021-09-20__1356
2021-09-20__1503
2021-09-20__1610
2021-09-20__1717
2021-09-20__1824
2021-09-20__1933
2021-09-20__2041
2021-09-20__2148
2021-09-20__2256
2021-09-21__0003
2021-09-21__0110
2021-09-21__0216
2021-09-21__0322
2021-09-21__0428
2021-09-21__0533
2021-09-21__0639
2021-09-21__0744
2021-09-21__0850
2021-09-21__0955
2021-09-21__1101
2021-09-21__1206
2021-09-21__1312
2021-09-21__1418
2021-09-21__1523
2021-09-21__1629
2021-09-21__1734
2021-09-21__1839
2021-09-21__1946
2021-09-21__2051
2021-09-21__2157
2021-09-21__2302
2021-09-22__0009
2021-09-22__0144
2021-09-22__0250
2021-09-22__0356
2021-09-22__0501
2021-09-22__0607
2021-09-26__2250
2021-09-30__2324');

$kretsTotal = 0;
$kretsForelopig = 0;
$kretsEndelig = 0;
$kretsOppgjor = 0;
$kretsForelopigOgEndelig = 0;
$kretsForelopigOgEndeligOgOppgjor = 0;

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
    $oppgjor100 = false;
    $oppgjor100_obj = null;
    foreach ($downloads as $download) {
        $filename = __DIR__ . '/../' . $download . '/' . $krets . '.json';
        $kretsObj = json_decode(file_get_contents($filename));
        echo $krets . ' - ' . $download . ':     foreløpig ' . $kretsObj->opptalt->forelopig . '     endelig ' . $kretsObj->opptalt->endelig . "\n";

        if (!$forelopig100_endelig0 && $kretsObj->opptalt->forelopig == 100 && $kretsObj->opptalt->endelig == 0) {
            file_put_contents(__DIR__ . '/forelopig100_endelig0/' . $krets . '.json', file_get_contents($filename));
            $forelopig100_endelig0 = true;
            $forelopig100_endelig0_obj = $kretsObj;
        }
        if ($kretsObj->opptalt->endelig == 100 && $kretsObj->opptalt->oppgjor == 0) {
            file_put_contents(__DIR__ . '/endelig100/' . $krets . '.json', file_get_contents($filename));
            $endelig100 = true;
            $endelig100_obj = $kretsObj;
            break;
        }
        if ($kretsObj->opptalt->oppgjor == 100) {
            file_put_contents(__DIR__ . '/oppgjor100/' . $krets . '.json', file_get_contents($filename));
            $oppgjor100 = true;
            $oppgjor100_obj = $kretsObj;
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
    if ($oppgjor100) {
        $kretsOppgjor++;
    }
    if ($forelopig100_endelig0 && $endelig100) {
        $kretsForelopigOgEndelig++;
    }
    if ($forelopig100_endelig0 && $endelig100 && $oppgjor100) {
        $kretsForelopigOgEndeligOgOppgjor++;
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

echo 'Totalt kretser ............................ : ' . $kretsTotal . "\n";
echo 'Forløpig 100%, endelig 0% ................. : ' . $kretsForelopig . "\n";
echo 'Endelig 100% .............................. : ' . $kretsEndelig . "\n";
echo 'Oppgjør 100% .............................. : ' . $kretsOppgjor . "\n";
echo "\n";
echo 'Data for foreløpig og endelig ............. : ' . $kretsForelopigOgEndelig . "\n";
echo 'Data for foreløpig og endelig og oppgjør .. : ' . $kretsForelopigOgEndeligOgOppgjor . "\n";
echo "\n";
echo "(^ Krets = nasjonalt, fylke, kommune og kretser i kommune. Får nok bare kretsnivå med både foreløpig og endelig)\n";
