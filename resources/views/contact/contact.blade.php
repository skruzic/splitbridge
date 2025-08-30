<x-layout.app>
    <x-slot:title>
        Kontakt
    </x-slot:title>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="py-16 overflow-hidden grid grid-cols-2 gap-6">
        <div class="col-span-2 md:col-span-1 flex items-stretch">
            <div class="flex flex-col border-y-[3px] border-primary p-8 w-full shadow-[0_0_24px_0_rgba(0,0,0,0.12)]">
                <div class="flex items-center space-x-4 mb-5 p-2 group transition-all">
                    <div
                        class="h-12 w-12 flex items-center justify-center bg-[#fdf1ec] rounded-full group-hover:bg-[#eb5d1e]">
                        <x-lucide-map-pin class="size-6 text-primary group-hover:text-white "/>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-xl font-semibold text-[#7a6960]">Lokacija:</h4>
                        <p class="text-sm text-muted-foreground">Osječka 24a, Split</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 mb-5 p-2 group transition-all">
                    <div
                        class="h-12 w-12 flex items-center justify-center bg-[#fdf1ec] rounded-full group-hover:bg-[#eb5d1e]">
                        <x-lucide-mail class="size-6 text-primary group-hover:text-white "/>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-xl font-semibold text-[#7a6960]">E-mail:</h4>
                        <p class="text-sm text-muted-foreground">klub@splitbridge.hr</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 mb-5 p-2 group transition-all">
                    <div
                        class="h-12 w-12 flex items-center justify-center bg-[#fdf1ec] rounded-full group-hover:bg-[#eb5d1e]">
                        <x-lucide-clock class="size-6 text-primary group-hover:text-white "/>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-xl font-semibold text-[#7a6960]">Turniri:</h4>
                        <p class="text-sm text-muted-foreground">Ponedjeljkom i četvrtkom od 19:00 sati</p>
                    </div>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2893.7514006633655!2d16.451926616323895!3d43.50752137912666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13355e1c9909d345%3A0x9ecb86a56c10cc74!2sBridge%20klub%20Split!5e0!3m2!1sen!2shr!4v1673780193490!5m2!1sen!2shr"
                    style="border:0; width:100%; height:290px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <div class="col-span-2 md:col-span-1 flex items-stretch">
            <form method="post" action="{{ route('contact.send') }}" class="flex flex-col border-y-[3px] border-primary p-8 w-full shadow-[0_0_24px_0_rgba(0,0,0,0.12)]">
                @csrf
                <div class="mb-5">
                    <label for="name" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Ime</label>
                    <input type="text" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="name" id="name" placeholder="Ime" required/>
                </div>
                <div class="mb-5">
                    <label for="email" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">E-mail</label>
                    <input type="email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="email" id="email" placeholder="E-mail" required/>
                </div>
                <div class="mb-5">
                    <label for="content" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Poruka</label>
                    <textarea type="text" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="content" id="content" placeholder="Poruka"
                              rows="5"
                              required></textarea>
                </div>

                <div class="text-center">
                    <x-button name="send">Pošalji</x-button>
                </div>
            </form>
        </div>
    </section>
</x-layout.app>
