<?php declare(strict_types=1);

namespace App\Domains\Device\Action;

use App\Domains\Device\Model\Device as Model;
use App\Domains\DeviceAlarm\Model\DeviceAlarm as DeviceAlarmModel;
use App\Domains\DeviceMessage\Model\DeviceMessage as DeviceMessageModel;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Device\Model\Device
     */
    protected ?Model $row;

    /**
     * @return \App\Domains\Device\Model\Device
     */
    public function create(): Model
    {
        return $this->actionHandle(Create::class, $this->validate()->create());
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->actionHandle(Delete::class);
    }

    /**
     * @return \App\Domains\Device\Model\Device
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\DeviceAlarm\Model\DeviceAlarm
     */
    public function updateDeviceAlarmCreate(): DeviceAlarmModel
    {
        return $this->actionHandle(UpdateDeviceAlarmCreate::class);
    }

    /**
     * @return \App\Domains\DeviceMessage\Model\DeviceMessage
     */
    public function updateDeviceMessageCreate(): DeviceMessageModel
    {
        return $this->actionHandle(UpdateDeviceMessageCreate::class);
    }
}
