<template>
    <div class="card w-75">
        <slot name="image"></slot>
        <div class="card-body">
            <h5 class="card-title">
                <slot name="bookName"></slot>
            </h5>
            <p>
                <slot name="description"></slot>
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Preis: <slot name="price"></slot>€
            </li>
            <li class="list-group-item">
                Lagerbestand: <slot name="stock"></slot>
            </li>
        </ul>
        <div class="card-body">
            <slot name="button"></slot>
            <slot name="warning"></slot>
        </div>
    </div>
</template>