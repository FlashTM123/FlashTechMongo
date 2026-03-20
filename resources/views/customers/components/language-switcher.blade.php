<div class="dropdown dropdown-end z-[1005]">
    <button type="button" tabindex="0" class="flex items-center gap-1.5 p-1.5 hover:bg-white/10 rounded-lg transition-colors text-slate-200 hover:text-white" title="{{ __('messages.nav.language') ?? 'Ngôn ngữ' }}" id="langDropdownBtn">
        <span class="text-lg leading-none">{{ locale_flag() }}</span>
        <span class="font-bold text-xs uppercase hidden sm:block">{{ app()->getLocale() }}</span>
        <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </button>
    
    <div tabindex="0" class="dropdown-content mt-2 w-40 bg-white rounded-xl shadow-xl shadow-slate-900/20 border border-slate-100 overflow-hidden transform origin-top-right">
        <div class="p-1.5 flex flex-col gap-1">
            @foreach(get_available_locales() as $code => $locale)
                <button type="button" onclick="switchLanguage(event, '{{ $code }}')" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition-colors w-full text-left {{ is_locale($code) ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-indigo-600' }}">
                    <span class="text-lg leading-none">{{ $locale['flag'] }}</span>
                    {{ $locale['name'] }}
                    @if(is_locale($code))
                        <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
</div>

<script>
function switchLanguage(event, locale) {
    event.preventDefault();

    // Save locale to session storage for chat widget
    sessionStorage.setItem('locale', locale);

    // Update HTML lang attribute
    document.documentElement.lang = locale;

    // Dispatch language change event
    const event2 = new CustomEvent('languageChanged', { detail: { locale: locale } });
    document.dispatchEvent(event2);

    // Redirect to switch language using direct URL construction
    window.location.href = '/lang/' + locale;
}
</script>
