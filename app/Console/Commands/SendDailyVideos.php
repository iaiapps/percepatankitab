<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Course;
use App\Models\Trackvideo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SendDailyVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:daily-videos {--batch=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim video harian ke user per batch dengan jeda antar user via WhatsApp setelah 5 hari aktivasi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $batch = (int) $this->option('batch');
        $batchSize = 20;
        $offset = ($batch - 1) * $batchSize;

        $users = User::where('type', 'pembeli')
            ->whereNotNull('activated_at')
            ->whereDate('activated_at', '<=', now()->subDays(0))
            ->orderBy('id')
            ->skip($offset)
            ->take($batchSize)
            ->get();

        $totalVideos = Course::count();

        $customMessage1 = [
            "> Percayalah kamu bisa, maka kamu sudah setengah jalan. — Theodore Roosevelt",
            "> Semuanya tampak mustahil sampai semuanya selesai. — Nelson Mandela",
            "> Saya tidak gagal. Saya hanya menemukan 10.000 cara yang tidak berhasil. — Thomas Edison",
            "> Bukan karena saya sangat pintar, tapi karena saya bertahan lebih lama dengan masalah. — Albert Einstein",
            "> Jangan pernah menyerah, tidak peduli apa pun. — Winston Churchill",
            "> Saya telah gagal berulang kali dalam hidup saya dan karena itulah saya berhasil. — Michael Jordan",
            "> Jangan hitung hari-harimu, buatlah hari-harimu berarti. — Muhammad Ali",
        ];
        $customMessage2 = [
            "Tetap semangat belajar! Kitab kuning bukan untuk ditakuti, tapi ditaklukkan! 💪📖",
            "Jangan menyerah di tengah jalan. Ilmu itu butuh kesabaran dan ketekunan! 💪📖",
            "Teruslah belajar, meski sulit di awal. Kesungguhan hari ini adalah kemudahan esok hari. 💪📖",
            "Ilmu tidak datang pada yang cepat menyerah, tapi pada yang sabar dan konsisten menjemputnya. Tetap semangat! 💪📖",
            "Kesulitan itu sementara. Tapi hasil dari ketekunan akan kamu rasakan seumur hidup. Tetap semangat menuntut ilmu! 💪📖",
            "Jangan takut salah. Justru dari kesalahan itulah jalan menuju paham dan mahir akan terbuka. Terus belajar! 💪📖",
            "Sedikit demi sedikit, asal terus konsisten, akan menjadi banyak dan berarti. Jangan lelah belajar! 💪📖",
        ];
        foreach ($users as $user) {
            $hariKe = now()->diffInDays($user->activated_at);
            $videosSent = Trackvideo::where('user_id', $user->id)->count();

            // Jika semua video sudah dikirim, skip user
            if ($videosSent >= $totalVideos) {
                continue;
            }

            // Ambil video berikutnya yang belum dikirim
            $nextVideo = Course::orderBy('id')->skip($videosSent)->first();

            if (!$nextVideo) {
                Log::warning("Tidak ada video berikutnya untuk {$user->name}");
                continue;
            }
            // 🎯 FORMAT PESAN YANG RAPI
            $hariKe = $videosSent + 1;
            $pesanIndex1 = ($hariKe - 1) % count($customMessage1);
            $satu = $customMessage1[$pesanIndex1];

            $pesanIndex2 = ($hariKe - 1) % count($customMessage2);
            $dua = $customMessage2[$pesanIndex2];


            $message = <<<EOT
🎥 *Video Hari ke-{$hariKe}*

Assalamualaikum warahmatullah 🌟

📘 *Nahwu-Sorof – Metode السباق*
🎯 Video Materi Target Harian:

*{$nextVideo->name}*
{$nextVideo->youtube_url}

{$satu}

{$dua}

#BelajarBacaKitabKuning#MetodeAssibaq#NahwuSorof
EOT;

            try {
                $response = Http::withHeaders([
                    'Authorization' => 'DQtfjXYnP1B185nrQAX2'
                ])->post('https://api.fonnte.com/send', [
                    'target' => preg_replace('/[^0-9]/', '', $user->no_hp),
                    'message' => $message,
                    'countryCode' => '62'
                ]);

                if (!$response->successful()) {
                    Log::error("❌ Gagal kirim WA ke {$user->name}: " . $response->body());
                    continue;
                }

                // Simpan log pengiriman
                Trackvideo::create([
                    'user_id'     => $user->id,
                    'course_id'   => $nextVideo->id,
                    'sent'        => true,
                    'sent_at'     => now(),
                ]);

                $this->info("✅ Video ke-{$hariKe} dikirim ke {$user->name}");

                sleep(10); // jeda 10 detik antar user
            } catch (\Exception $e) {
                Log::error("❌ Exception saat kirim ke {$user->name}: " . $e->getMessage());
            }
        }

        return Command::SUCCESS;
    }
}
