# Generated by Django 2.1 on 2018-09-05 08:35

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0092_auto_20180904_0716'),
    ]

    operations = [
        migrations.AlterField(
            model_name='companybusiness',
            name='user',
            field=models.OneToOneField(on_delete=django.db.models.deletion.CASCADE, to=settings.AUTH_USER_MODEL),
        ),
    ]