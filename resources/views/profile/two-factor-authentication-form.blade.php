<x-jet-action-section>
    <x-slot name="title">
        {{ __('İki Faktörlü Doğrulama') }}
    </x-slot>

    <x-slot name="description">
        {{ __('İki faktörlü kimlik doğrulamayı kullanarak hesabınıza ek güvenlik ekleyin.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('İki faktörlü doğrulamayı etkinleştirmeyi bitirin.') }}
                @else
                    {{ __('İki faktörlü doğrulamayı etkinleştirdiniz.') }}
                @endif
            @else
                {{ __('Henüz iki faktörlü doğrulamayı etkinleştirmediniz.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('İki faktörlü kimlik doğrulama etkinleştirildiğinde, kimlik doğrulama sırasında güvenli, rastgele bir jeton istenir. Bu jetonu telefonunuzun Google Authenticator uygulamasından alabilirsiniz.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('İki faktörlü kimlik doğrulamayı etkinleştirmeyi tamamlamak için telefonunuzun kimlik doğrulama uygulamasını kullanarak aşağıdaki QR kodunu tarayın veya kurulum anahtarını girin ve oluşturulan OTP kodunu sağlayın.') }}
                        @else
                            {{ __('İki faktörlü kimlik doğrulama şimdi etkinleştirildi. Telefonunuzun kimlik doğrulama uygulamasını kullanarak aşağıdaki QR kodunu tarayın veya kurulum anahtarını girin.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Kurulum Anahtarı') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-jet-label for="code" value="{{ __('Code') }}" />

                        <x-jet-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-jet-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Bu kurtarma kodlarını güvenli bir parola yöneticisinde saklayın. İki faktörlü kimlik doğrulama cihazınız kaybolursa, hesabınıza erişimi kurtarmak için kullanılabilirler.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Etkinleştir') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Kurtarma Kodlarını Tekrar Oluştur') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @elseif ($showingConfirmation)
                    <x-jet-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-jet-button type="button" class="mr-3" wire:loading.attr="disabled">
                            {{ __('Onayla') }}
                        </x-jet-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Kurtarma Kodlarını Göster') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-secondary-button wire:loading.attr="disabled">
                            {{ __('İptal Et') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-jet-danger-button wire:loading.attr="disabled">
                            {{ __('Devredışı Bırak') }}
                        </x-jet-danger-button>
                    </x-jet-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-jet-action-section>
