<template>
    <div class="lds-dual-ring"></div>
</template>

<style lang="scss" scoped>
@import "/resources/scss/_variables.scss";

.lds-dual-ring {
    margin: 0 auto;

    &:after {
        margin: 0 auto;
        content: " ";
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 5px solid $yellow;
        border-color: $yellow transparent $yellow transparent;
        animation: lds-dual-ring 0.8s linear infinite;
    }
}

@keyframes lds-dual-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

</style>
