{{-- resources/views/components/admin/modal.blade.php --}}
<div
  x-data="{ open: false }"
  x-effect="$watch(() => {{ $show ?? 'false' }}, value => open = value)"
  class="relative"
>
  {{-- Backdrop --}}
  <div
    x-show="open"
    x-transition.opacity
    class="fixed inset-0 bg-black/50 z-40"
    @click="{{ $onClose ?? 'open = false' }}"
  ></div>

  {{-- Modal panel --}}
  <div
    x-show="open"
    x-transition
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    aria-modal="true"
    role="dialog"
  >
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
      <button
        @click="{{ $onClose ?? 'open = false' }}"
        class="absolute top-2 right-3 text-gray-400 hover:text-gray-600"
        aria-label="Close"
      >
        ✕
      </button>

      @if (!empty($title))
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ $title }}</h3>
      @endif

      {{ $slot }}
    </div>
  </div>
</div>