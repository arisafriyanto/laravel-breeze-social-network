<x-app-layout>

    <x-statistic :user="$user" />

    <x-container>

        <div class="grid grid-cols-2">

            <div class="space-y-5">
                <x-statuses :statuses="$statuses" />
            </div>

        </div>
    </x-container>
</x-app-layout>
