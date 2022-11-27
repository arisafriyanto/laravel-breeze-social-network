<x-app-layout>

    <x-statistic :user="$user" />

    <x-container>

        <div class="grid grid-cols-3 gap-5">

            <x-following :users="$follows"></x-following>

        </div>
    </x-container>
</x-app-layout>
