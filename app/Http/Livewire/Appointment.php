<?php

namespace App\Http\Livewire;

use App\Models\Appointment as Appointments;
use Livewire\Component;

class Appointment extends Component
{
    public $appointments = [];
    public $ScheduledAppointments;
    public $ConfiremdAppointments;
    public $appointmentStatus;

    public function mount()
    {
        $this->appointments = Appointments::latest()->get();
        $this->status();
    }

    public function confirm($appointmentId)
    {
        $appointment = Appointments::find($appointmentId);
        $appointment->confirmed = true;
        $appointment->save();
        $this->mount();
        $this->render();
    }

    public function status()
    {
        $this->ScheduledAppointments = Appointments::where('confirmed', 0)->count();
        $this->ConfiremdAppointments = Appointments::where('confirmed', 1)->count();
    }

    public function updatedAppointmentStatus()
    {
        $this->filterTableByAppointmentStatus();
    }

    protected function filterTableByAppointmentStatus()
    {
        if (!empty($this->appointmentStatus)) {
            $this->appointments = Appointments::latest()
                ->where('confirmed', $this->appointmentStatus)
                ->get();
        } else {
            $this->appointments = Appointments::latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.appointment');
    }
}
