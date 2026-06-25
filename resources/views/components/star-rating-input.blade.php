{{-- Komponen Input Bintang Interaktif (CSS Only) --}}
<div class="flex flex-row-reverse justify-end gap-1 [&_input:checked~label]:text-[#4edea3] [&_label:hover]:text-[#4edea3] [&_label:hover~label]:text-[#4edea3]">
    {{-- Bintang 5 --}}
    <input type="radio" id="star5" name="rating" value="5" class="hidden" />
    <label for="star5" class="cursor-pointer text-white/20 transition-all duration-200 material-symbols-outlined text-3xl hover:scale-110 drop-shadow-md" style="font-variation-settings: 'FILL' 1;">star</label>
    
    {{-- Bintang 4 --}}
    <input type="radio" id="star4" name="rating" value="4" class="hidden" />
    <label for="star4" class="cursor-pointer text-white/20 transition-all duration-200 material-symbols-outlined text-3xl hover:scale-110 drop-shadow-md" style="font-variation-settings: 'FILL' 1;">star</label>
    
    {{-- Bintang 3 --}}
    <input type="radio" id="star3" name="rating" value="3" class="hidden" />
    <label for="star3" class="cursor-pointer text-white/20 transition-all duration-200 material-symbols-outlined text-3xl hover:scale-110 drop-shadow-md" style="font-variation-settings: 'FILL' 1;">star</label>
    
    {{-- Bintang 2 --}}
    <input type="radio" id="star2" name="rating" value="2" class="hidden" />
    <label for="star2" class="cursor-pointer text-white/20 transition-all duration-200 material-symbols-outlined text-3xl hover:scale-110 drop-shadow-md" style="font-variation-settings: 'FILL' 1;">star</label>
    
    {{-- Bintang 1 --}}
    <input type="radio" id="star1" name="rating" value="1" class="hidden" required />
    <label for="star1" class="cursor-pointer text-white/20 transition-all duration-200 material-symbols-outlined text-3xl hover:scale-110 drop-shadow-md" style="font-variation-settings: 'FILL' 1;">star</label>
</div>