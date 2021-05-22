using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class OpinionLectuer
    {
        public int Id { get; set; }

        public int LectuerId { get; set; }
        public virtual Lectuer Lectuer { get; set; }
        public string Description { get; set; }

        public int Grade { get; set; }
    }
}
