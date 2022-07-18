<template>
    <NavBar />

    <section class="px-10 py-5">
        <slot></slot>
    </section>
</template>
<script>
import NavBar from '../Components/NavBar.vue';
import SideBar from '../Components/SideBar.vue';
export default {
    components: { NavBar, SideBar, },
}
</script>