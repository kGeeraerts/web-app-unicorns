<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\ConfirmsPasswords;
use Livewire\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadUserData extends Component {
    use ConfirmsPasswords;

    public function downloadUserData(User $user): StreamedResponse {
        Storage::deleteDirectory('downloads');
        $path = sprintf("downloads/User Data %s %s.json", $user->name, Carbon::now('europe/brussels'));
        Storage::put($path, $user, 'private');
        return Storage::download($path);
    }

    public function render(): View {
        return view('profile.download-user-data');
    }
}
