<?php

namespace WindsonDias\Toasts\Enums;

enum ToastTypeEnum: string
{
    case SUCCESS = 'success';

    case ERROR = 'error';

    case WARNING = 'warning';

    case INFORMATION = 'information';
}
