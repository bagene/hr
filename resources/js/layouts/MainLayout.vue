<template>
    <div class="flex bg-gray-100">
        <section>
            <SideBar />
        </section>
        <section class="w-full">
            <NavBar />

            <section class="main-content px-10 py-5">
                <slot></slot>
            </section>
        </section>

    </div>
</template>
<script>
import NavBar from '../Components/NavBar.vue';
import SideBar from '../Components/SideBar.vue';
export default {
    components: { NavBar, SideBar, },
}
</script>