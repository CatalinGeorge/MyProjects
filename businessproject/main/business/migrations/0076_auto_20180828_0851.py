# Generated by Django 2.1 on 2018-08-28 08:51

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0075_auto_20180828_0843'),
    ]

    operations = [
        migrations.AlterField(
            model_name='chat',
            name='sender',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, related_name='sender_select', to=settings.AUTH_USER_MODEL),
        ),
    ]