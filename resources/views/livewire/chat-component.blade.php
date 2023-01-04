<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-2xl mx-auto py-8 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">

                <div class="grid grid-cols-3 divide-x divide-gray-700">
                    <div class="col-span-1">
                        <div class="bg-gray-300 h-16 flex items-center px-4">
                            <img class="w-10 h-10 object-cover object-center" src="{{ Auth::user()->profile_photo_url }}">
                        </div>

                        <div class="bg-gray-200 h-14 flex items-center px-4">
                            <x-jet-input type="text"
                                wire:model="search"
                                class="w-full"
                                placeholder="Buscar" />
                        </div>
                        <div class="h-[calc(100vh-18.5rem)] overflow-auto border-t border-gray-700">
                            <div class="px-4 py-3">
                                <h2 class="text-gray-700 text-lg mb-4">Contactos</h2>

                                <ul class="space-y-4">
                                    @forelse ($this->users as $user)
                                        <li class="cursor-pointer" wire:click="open_chat_user({{ $user }})">
                                            <div class="flex">
                                                <figure class="flex-shrink-0">
                                                    <img class="h-12 w-12 object-cover object-center rounded-full" src="{{ $user->profile_photo_url }}">
                                                </figure>

                                                <div class="flex-1 ml-5 border-b border-gray-700">
                                                    <p class="text-gray-700">
                                                        {{ $user->name }}
                                                    </p>
                                                    <p class="text-gray-500 text-xs">
                                                        {{ $user->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        @if ($userChat || $chat)
                            <div class="bg-gray-300 h-16 flex items-center px-3">
                                <figure>
                                    <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ $userChat->profile_photo_url }}">
                                </figure>

                                <div class="ml-4">
                                    <p class="text-gray-800">
                                        {{ $userChat->name }}
                                    </p>
                                    <p class="text-green-800 text-xs">
                                        En línea
                                    </p>
                                </div>
                            </div>

                            <div class="h-[calc(100vh-18rem)] overflow-auto">
                                el contenido de nuestro chat
                            </div>

                            <form class="bg-gray-100 h-16 flex items-center px-4">
                                <x-jet-input type="text" class="flex-1" placeholder="Escribe tu mensaje" />

                                <button class="flex-shrink-0 ml-4 text-xl text-gray-700">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
