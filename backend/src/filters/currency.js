export default function currencyUSD(value) {
    return new Intl.NumberFormat('bs-BA', {style: 'currency', currency: 'BAM'})
        .format(value);
}
