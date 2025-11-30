@php
    // $record está disponible automáticamente en ViewColumn
    $assoc = $record->transportAssociation ?? null;
    $isRepresentative = $assoc && $record->id === $assoc->partner_id;
@endphp

<div style="display:flex; align-items:center; gap:0.5rem;">
    <div>{{ $record }}</div>

    @if($isRepresentative)
        <span style="
            display:inline-flex;
            align-items:center;
            padding:2px 8px;
            font-size:11px;
            font-weight:600;
            border-radius:999px;
            background:#16a34a; /* green-600 */
            color:#fff;
        ">
            Representante Legal
        </span>
    @endif
</div>
